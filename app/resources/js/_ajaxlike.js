$(function(){
  //利用する変数を宣言（var 変数名 = 値）
  var like = $('.btn btn-primary');
  var likeSaleId;

  //on()はイベントを処理するメソッド
  like.on('click', function() {
    var $this = $(this);
    likeSaleId = $this.data('saleid');
    $.ajax({
      headers: {
        //Laravelでajaxを利用するためにはCSRFトークンを設定する必要がある
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/ajaxlike', //ルートの記述
      type: 'POST', //受け取り方法の記述
      data: {
        'sales_id':likeSaleId //コントローラーに渡すパラメーター
      },
    })

    //Ajaxリクエストが成功した時
    //.done()は後で実行したい処理
    .done(function(data) {
      //lovedクラスを追加
      $this.toggleClass('loved');
      //.likesCountの次の要素のhtmlを「data.saleLikesCount」の値に書き換える
      $this.next('.likesCount').html(data.saleLikesCount);
    })

    //Ajaxリクエストが失敗した時
    //.fail()メソッドはエラーメッセージを出力する
    .fail(function(data, xhr, err) {
      console.log('エラー');
      console.log(err);
      console.log(xhr);
    });

    return false;

  })
})