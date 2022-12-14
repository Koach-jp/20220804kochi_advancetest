# お問い合わせ管理アプリ
- お客様がお問い合わせを送信することができる。
- お問い合わせはmySQLのデータベースに保存される。
- 管理者がデータベースに保存されたお問い合わせの一覧を見ることができる。
- 画面横幅が1000px以上のブラウザを想定。
![image](https://user-images.githubusercontent.com/104754786/182795448-fd00e192-6fe7-4fab-85f9-94ee3612579e.png)
![image](https://user-images.githubusercontent.com/104754786/182795702-7e5cb0af-5949-4bdc-83b3-26b85f39ce5b.png)


## 作成した目的
- お客様からの製品に対するご意見やご質問を頂きやすくするため。
- お問い合わせのフォームを設けることで、お客様からの声を把握（管理）しやすくするため。
- （メタ理由：アドバンステストで課せられたため。旧教材で学んだためREADMEを書いたことがないので書き方は見よう見まねです。）


## 機能一覧
- お問い合わせを送信する機能
- お問い合わせ送信前に確認画面でチェックできる機能
- お問い合わせ修正時に内容が保持される機能
- お問い合わせ送信後にサンクスページを表示する機能
- お問い合わせを一覧表示できる管理システム機能
- お問い合わせ一覧から、名前、性別、登録日、メールアドレスで検索できる機能
- お問い合わせ削除機能

### その他細かな機能
#### お問い合わせフォーム
- リアルタイムバリデーション機能
- 郵便番号が全角の場合、リアルタイムで半角に変換する機能
- 郵便番号に7桁の数字で撃つと自動でハイフンが挿入される機能
- 郵便番号を (3桁の数字)-(4桁の数字)以外をバリデーションエラーにする機能
- 郵便番号から自動で住所を入力する機能
- 正しい情報を入力し終わるまで確認ボタンが押せなくなる機能
#### 管理システム
- ご意見にマウスオーバーすると残りが表示される機能
- 検索クエリを検索後も保持する機能
- お問い合わせを削除したときに同じページに留まる機能（検索後の削除も同ページに留まる）
- 最後のページの表示件数が1件の場合、お問い合わせを削除したときはその前のページが表示される機能
- ページナビが一定以上の幅に膨らまない機能
- ダミーデータのシーディングにおいて、名前と一般的な性別が一致し、日付は今日から3日後まででランダムに生成する機能


## 使用技術（実行環境）
- PHP  8.1.5
- Laravel  8.83.23
- jQuery  3.6.0
- jQuery UI  1.13.2


## テーブル設計
![image](https://user-images.githubusercontent.com/104754786/182804950-be87393e-de5a-4f74-bd94-f0fd37c16e5f.png)


## ER図
![image](https://user-images.githubusercontent.com/104754786/182805942-5d49ad36-c295-486e-84f9-63c0b66a1bc5.png)


## 他に記載することがあれば記述する
- mySQLのデータベース名：advancetestdb
