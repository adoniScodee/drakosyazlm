<?php
// Drakos child theme functions - basic enqueues and AI AJAX endpoint
add_action('wp_enqueue_scripts', 'drakos_enqueue_styles');
function drakos_enqueue_styles() {
    wp_enqueue_style('drakos-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    // small icon fallback
    wp_enqueue_style('drakos-inline', false);
}

add_action('wp_ajax_drk_ai_chat', 'drk_ai_chat');
add_action('wp_ajax_nopriv_drk_ai_chat', 'drk_ai_chat');

function drk_ai_chat() {
    // Basic security checks
    if ( ! isset($_POST['message']) ) {
        wp_send_json_error('Mesaj eksik');
    }
    $message = sanitize_text_field($_POST['message']);

    // IMPORTANT: Do NOT hardcode API key here. Set in wp-config.php as DRK_OPENAI_API_KEY
    if ( defined('DRK_OPENAI_API_KEY') ) {
        $api_key = DRK_OPENAI_API_KEY;
    } else {
        wp_send_json_error('OpenAI API anahtarı ayarlı değil. Lütfen wp-config.php içine DRK_OPENAI_API_KEY tanımlayın.');
    }

    $body = array(
      'model' => 'gpt-4o-mini',
      'messages' => array(
         array('role' => 'system','content' => 'Sen Drakos yazılım asistanısın. Kısa ve net cevap ver.'),
         array('role' => 'user','content' => $message)
      ),
      'max_tokens' => 450
    );

    $response = wp_remote_post('https://api.openai.com/v1/chat/completions', array(
      'headers' => array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $api_key
      ),
      'body' => wp_json_encode($body),
      'timeout' => 30
    ));

    if ( is_wp_error($response) ) {
        wp_send_json_error('API isteğinde hata: ' . $response->get_error_message());
    }
    $resp_body = json_decode(wp_remote_retrieve_body($response), true);

    if ( isset($resp_body['error']) ) {
        wp_send_json_error($resp_body['error']['message']);
    }

    $assistant_text = isset($resp_body['choices'][0]['message']['content']) ? $resp_body['choices'][0]['message']['content'] : 'Yanıt alınamadı';
    wp_send_json_success(array('reply' => $assistant_text));
}
