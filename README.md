# schedule_adjuster

## 概要

予定調整アプリです。メッセンジャーアプリLINEの日程調整機能と同じような使用方法で、複数人での予定調整が時間単位でできます。動作確認は以下で出来ます。

http://scheduleadjuster2.herokuapp.com/
(現在エラーにより表示出来ません。原因調査中です。以下に画面一覧と操作概要を示しました。)

日程調整用カレンダー新規作成画面
<img width="1242" alt="スクリーンショット 2022-12-10 11 53 28" src="https://user-images.githubusercontent.com/72178844/206826192-c3a7d4bd-ea35-4ba1-aa3a-0b2c5601e936.png">

日程調整用カレンダー一覧画面
<img width="1420" alt="スクリーンショット 2022-12-10 11 52 31" src="https://user-images.githubusercontent.com/72178844/206826606-afab4884-c20c-4e35-877e-ead32ab663a7.png">


スケジュール入力画面(複数日、複数時間、を同時に登録できるようにしています。)
<img width="1248" alt="スクリーンショット 2022-12-10 11 52 59" src="https://user-images.githubusercontent.com/72178844/206826250-93353f6b-f579-47a3-bc0c-7eff5a50b3aa.png">

スケジュール詳細画面(日付部分の右には、ログインユーザである自分の都合よい時間が表示されています。日付部分をクリックすると、他のユーザの空いている時間を確認できます。)
<img width="1398" alt="スクリーンショット 2022-12-10 11 52 47" src="https://user-images.githubusercontent.com/72178844/206826536-13d0ca9d-7b55-4f33-882c-cb27d77bf65c.png">

詳細画面の日程調整参加URLを他の人に共有して、他の人がこのURLにアクセスすると、、、

<img width="1229" alt="スクリーンショット 2022-12-10 11 55 14" src="https://user-images.githubusercontent.com/72178844/206826690-39c420d6-a1db-4272-a7ea-137676125b9b.png">


新しいユーザがカレンダーに参加し、メンバーを追加して日程調整を行えます！

<img width="1258" alt="スクリーンショット 2022-12-10 11 55 29" src="https://user-images.githubusercontent.com/72178844/206826694-7a2434c1-804f-4f5e-b139-12542aeb53f4.png">


テストユーザ

メールアドレス: test@test.com

パスワード: password


　現在私は軽音サークルに所属していて、バンド練習のスケジュールを組むときにLINEアプリの日程調整を使用しています。LINEアプリの日程調整では、スケジュールの登録を日付ごとに、○、△、✕のどれかで選択することができるのですが、大学の授業やアルバイトなどで一日空いている日というのは少なく、例えば18:00までなら空いている日があった場合、△を選択して一番下のコメント欄に「～日は18:00まで参加できます」などと記入する、という方法をとっています。このような方法では、入力する側も、それを確認する側も手間が増えて面倒なので、○、△、✕だけではなく、時間単位でスケジュールの入力が出来たほうが便利だと考え、このようなアプリを作成しました。


## 使用技術

・開発環境, Docker

・言語/フレームワーク, PHP/Laravel

・データベース, MySQL

・本番環境, Heroku

## 機能一覧

・認証機能

・日程調整用カレンダー登録機能

・カレンダー一覧表示機能

・カレンダー削除機能

・カレンダー参加機能（あるユーザが参加URLを他ユーザに共有し、他ユーザがURLにアクセスすることで参加できる。）

・スケジュール登録機能

・スケジュール更新機能

・スケジュール削除機能

・単体テスト機能

## 工夫した点
　テストを書くことで、テスタブルなコード、保守性の高いコードとなるようにしました。

　イシューごとに作業用ブランチを切ってそこからプルリクエストを発行する、といったようにチーム開発を想定したGit、Githubの使用を心がけました。

　
