<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>BookStore</title>
  <base href="{{asset('bookstore')}}/">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/transitions.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/color.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="shortcut icon" type="image/x-icon" href="\images\icon\logoteambua.png">
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-187250841-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-187250841-2');
    </script>
</head>
</head>
<body>
  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <!--*************************************************************************-->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-187250841-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-187250841-2');
    </script>
</head>
<body>
  @include('layout_index.header')
  @yield('content')
  @include('layout_index.footer')
  <!--*************************************************************************-->
 
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  <script src="js/vendor/jquery-library.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.vide.min.js"></script>
  <script src="js/countdown.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/parallax.js"></script>
  <script src="js/countTo.js"></script>
  <script src="js/appear.js"></script>
  <script src="js/gmap3.js"></script>
  <script src="js/main.js"></script>
  <!--*************************************************************************-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&#038;version=v2.9"></script>

@yield('show')
@yield('speak')
  <style>
    .fb-livechat,
    .fb-widget {
      display: none
    }

    .ctrlq.fb-button,
    .ctrlq.fb-close {
      position: fixed;
      right: 10px;
      cursor: pointer;
      padding: 0 8px;
      background: #ff3200;
    }

    .ctrlq.fb-button {
      z-index: 999;
      background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff;
      width: 50px;
      height: 50px;
      text-align: center;
      bottom: 80px;
      border: 0;
      outline: 0;
      border-radius: 60px;
      -webkit-border-radius: 60px;
      -moz-border-radius: 60px;
      -ms-border-radius: 60px;
      -o-border-radius: 60px;
      box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16);
      -webkit-transition: box-shadow .2s ease;
      background-size: 80%;
      transition: all .2s ease-in-out
    }

    .ctrlq.fb-button:focus,
    .ctrlq.fb-button:hover {
      transform: scale(1.1);
      box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)
    }

    .fb-widget {
      background: #fff;
      z-index: 1000;
      position: fixed;
      width: 360px;
      height: 435px;
      overflow: hidden;
      opacity: 0;
      bottom: 0;
      right: 24px;
      border-radius: 6px;
      -o-border-radius: 6px;
      -webkit-border-radius: 6px;
      box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
      -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
      -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16);
      -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)
    }

    .fb-credit {
      text-align: center;
      margin-top: 8px
    }

    .fb-credit a {
      transition: none;
      color: #eee;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 12px;
      text-decoration: none;
      border: 0;
      font-weight: 400
    }

    .ctrlq.fb-overlay {
      z-index: 0;
      position: fixed;
      height: 100vh;
      width: 100vw;
      -webkit-transition: opacity .4s, visibility .4s;
      transition: opacity .4s, visibility .4s;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, .05);
      display: none
    }

    .ctrlq.fb-close {
      z-index: 4;
      padding: 0 8px;
      background: #ff3200;
      font-weight: 700;
      font-size: 11px;
      color: #fff;
      margin: 0 15px 8px 0;
      border-radius: 3px
    }

    .ctrlq.fb-close::after {
      content: "X";
      font-family: sans-serif
    }

    .bubble {
      width: 20px;
      height: 20px;
      background: #c00;
      color: #fff;
      position: absolute;
      z-index: 999999999;
      text-align: center;
      vertical-align: middle;
      top: -2px;
      left: -5px;
      border-radius: 50%;
    }

    .bubble-msg {
      width: 197px;
      left: -208px;
      top: 5px;
      position: relative;
      background: rgba(59, 89, 152, .8);
      color: #fff;
      padding: 5px 8px;
      border-radius: 5px;
      text-align: center;
      font-size: 13px;
    }
  </style>
  <div class="fb-livechat">
    <div class="ctrlq fb-overlay"></div>
    <div class="fb-widget">
      <div class="ctrlq fb-close"></div>
      <div class="fb-page" data-href="https://www.facebook.com/websitebookstore" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div>
      <div class="fb-credit"> <a href="https://hoaky68.com" target="_blank" rel="noopener noreferrer">web_sach.nhom10</a> </div>
      <div id="fb-root"></div>
    </div><a href="https://m.me/&#039; + link_mobile + &#039;" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button" rel="nofollow" target="_blank">
      <div class="bubble-msg">Bạn cần hỗ trợ gì không ?</div>
    </a>
  </div>
  <script>
    jQuery(document).ready(function($) {
      function detectmob() {
        if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
          return true;
        } else {
          return false;
        }
      }
      var t = {
        delay: 125,
        overlay: $(".fb-overlay"),
        widget: $(".fb-widget"),
        button: $(".fb-button")
      };
      setTimeout(function() {
        $("div.fb-livechat").fadeIn()
      }, 8 * t.delay);
      if (!detectmob()) {
        $(".ctrlq").on("click", function(e) {
          e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
            bottom: 0,
            opacity: 0
          }, 2 * t.delay, function() {
            $(this).hide("slow"), t.button.show()
          })) : t.button.fadeOut("medium", function() {
            t.widget.stop().show().animate({
              bottom: "30px",
              opacity: 1
            }, 2 * t.delay), t.overlay.fadeIn(t.delay)
          })
        })
      }
    });
  </script>
  <script>
    function AddCart(id) {
      $.ajax({
        url: "{{url('addcart')}}" + '/' + id,
        type: 'GET',
        success: function(response) {
          $('.quntity').html(response['cart']['totalQty']);
          $('.total-price').html('('+Number(response['cart']['totalPrice']).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + 'VNĐ)');
          Swal.fire({
            icon: 'success',
            title: 'Đã thêm vào giỏ hàng',
            showConfirmButton: false,
            timer: 1500
          })
        },
        error: function(response) {
          Swal.fire({
            icon: 'error',
            title: 'Sách đã hết hàng',
            showConfirmButton: false,
            timer: 1500
          })
        }
      })
    }
  </script>
  <script>
    $(document).ready(function(){
      $('#sort_by').on('change',function(){
        var url = $(this).val();
          if(url){
            window.location = url;
          }
          return false;
      })
    })
  </script>
  @yield('script')
  @yield('speak')
  </body>

</html>