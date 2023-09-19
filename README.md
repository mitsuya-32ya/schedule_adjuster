# schedule_adjuster

## 概要

予定調整アプリです。メッセンジャーアプリLINEの日程調整機能と同じような使用方法で、複数人での予定調整が時間単位でできます。


日程調整用カレンダー新規作成画面
<img width="1242" alt="スクリーンショット 2022-12-10 11 53 28" src="https://user-images.githubusercontent.com/72178844/206826192-c3a7d4bd-ea35-4ba1-aa3a-0b2c5601e936.png">

日程調整用カレンダー一覧画面
<img width="1420" alt="スクリーンショット 2022-12-10 11 52 31" src="https://user-images.githubusercontent.com/72178844/206826606-afab4884-c20c-4e35-877e-ead32ab663a7.png">


スケジュール入力画面(それぞれの日にちにおける、都合良い時間を同時に登録できるようにしています。)
<img width="1248" alt="スクリーンショット 2022-12-10 11 52 59" src="https://user-images.githubusercontent.com/72178844/206826250-93353f6b-f579-47a3-bc0c-7eff5a50b3aa.png">

スケジュール詳細画面(日付部分の右には、ログインユーザである自分の都合よい時間が表示されています。日付部分をクリックすると、他のユーザの空いている時間を確認できます。)
<img width="1398" alt="スクリーンショット 2022-12-10 11 52 47" src="https://user-images.githubusercontent.com/72178844/206826536-13d0ca9d-7b55-4f33-882c-cb27d77bf65c.png">

詳細画面の日程調整参加URLを他の人に共有して、他の人がこのURLにアクセスすると、、、

<img width="1229" alt="スクリーンショット 2022-12-10 11 55 14" src="https://user-images.githubusercontent.com/72178844/206826690-39c420d6-a1db-4272-a7ea-137676125b9b.png">


新しいユーザがカレンダーに参加し、メンバーを追加して日程調整を行えます！

<img width="1258" alt="スクリーンショット 2022-12-10 11 55 29" src="https://user-images.githubusercontent.com/72178844/206826694-7a2434c1-804f-4f5e-b139-12542aeb53f4.png">




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


　
