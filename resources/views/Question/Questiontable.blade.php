   <table class="tableborder">
    <tr>
        <th class="bordertopic">問題名稱</th>
        <th class="bordertopic">問題類別</th>
        <th class="bordertopic">問題狀態</th>
        <th class="bordertopic">描述</th>
    </tr>
    @foreach($QAll as $test1)
    <tfoot>
    <tr>
   
    <td class="textw30 text-a-left">&nbsp;
    {{$test1->topic}}&nbsp;
    <td class="textw5 text-a-center">{{$test1->type}}&nbsp;
    <td class="textw5 text-a-center">
       {{$test1->status}}
        &nbsp;
    <td class="textw30 text-a-left">&nbsp;{{$test1->description}}<br>
    </tr>
    </tfoot>
    @endforeach
</table>

