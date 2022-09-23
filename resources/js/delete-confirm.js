// 削除前に確認画面を表示
const calenderDeleteButton = document.querySelector('#calender-delete-button');
const calenderDeleteForm = document.querySelector('#calender-delete-form');

calenderDeleteButton.addEventListener('click', function() {
    if(confirm('本当に削除しますか？')){
        calenderDeleteForm.submit();
    }
});