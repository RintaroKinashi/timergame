<!-- DBの接続状況を管理 -->

<?php
/**
 * PDOを使ってデータベースに接続する
 * @return PDO
 */
function getDatabaseConnection()
{
  try {
    $dsn = 'mysql:dbname=timergame;charset=utf8mb4';
    $user = 'root';
    $password = 'root';
    $dbh = new PDO($dsn, $user, $password, [
      // エラー発生時にエラーを投げる。（エラーコードのみ等ではなく）
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      // 結果セットに 返された際のカラム名で添字を付けた配列を返す。
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
  } catch (PDOException $e) {
    echo "MySQL への接続に失敗しました。<\br>(" . $e->getMessage() . ")";
    exit;
  }
  return $dbh;
}