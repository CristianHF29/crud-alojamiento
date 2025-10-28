<?php
require_once __DIR__.'/auth.php';
if (!is_admin()) {
  http_response_code(403);
  echo "Solo administrador.";
  exit;
}
