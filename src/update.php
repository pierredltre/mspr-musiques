<?php
$table = $_GET['table'];
$id = $_GET['id'];

if ($table == "ALBUM") {

}

function echo_ligne_MATABLE($donnee) {
  // HEREDOC php
  $html = <<<EOT
     <tr>
        <td>{$donnee['col1']}</td>
        <td>{$donnee['col2']}</td>
        <td>{$donnee['col3']}</td>
     </tr>
EOT;

  return $html;
}

?>