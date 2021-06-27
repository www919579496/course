{{-- 我们在头部视图的文件名前面加了下划线 _，这样做是为了指定该视图文件为局部视图，
    为局部视图增加前缀下划线是『约定俗成』的做法，方便了其它人快速地理解该文件的实际作用。--}}

<footer class="footer">
  <img class="brand-icon" src="https://cdn.learnku.com/uploads/sites/KDiyAbV0hj1ytHpRTOlVpucbLebonxeX.png">
  <a href="https://learnku.com/laravel/courses" target=_blank>
    肉品安全追溯系統頁尾
  </a>

  <div class="float-right">
    <a href="{{route('about')}}" >關於</a>
  </div>
</footer>