<div class="visible-print text-center">
    {!! QrCode::size(100)->generate(Request::url()); !!}
    <p> fot test ,url = localhost/course/public </p>
</div>