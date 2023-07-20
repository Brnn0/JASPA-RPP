<style>
body {
    font-family: consolas;
}

table {
    border-collapse: collapse;
}

td {
    border:1px solid;
}

</style>
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
<?php

require 'app/sys/config.php';

$sqls  = file_get_contents("app/database/tables.sql");

$sqls = explode(";",$sqls);

print "<h3>SQL Executado</h3>";
print "<pre class='sqls'>";
print "<code class='language-sql'>";
foreach ($sqls as $sql) {
    print $sql;
    if ($sql != "")
        $pdo->exec($sql);
}
print "</code></pre>";

$stmt = $pdo->query("SELECT name FROM sqlite_master WHERE type = 'table' ORDER BY name");

print "<h3>Tabelas existentes</h3>";
print "<div class='tables'>";
while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    $stmt2 = $pdo->query("SELECT * FROM pragma_table_info('{$row['name']}');");

    
    print "<table>";
    print "<caption>{$row['name']}</caption>";
    while ($row2 = $stmt2->fetch(\PDO::FETCH_ASSOC)){
        print "<tr>";
        print "<td>{$row2['name']}</td><td>{$row2['type']}</td>";
        print "</tr>";
    }

    $stmt2 = $pdo->query("SELECT count(*) as qtd FROM {$row['name']};");
    $row2 = $stmt2->fetch(\PDO::FETCH_ASSOC);
    print "<tr><td colspan='2'>{$row2['qtd']} linhas</td></tr>";
    print "</table>";
}
print "</div>";