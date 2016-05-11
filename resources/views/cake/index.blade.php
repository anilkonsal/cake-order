@extends('layout')

@section('content')
    @if($orders)
    <table class="table">
        <tr>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Type of Cake
            </th>
            <th>
                Celebration Type
            </th>
            <th>
                Dream Cake
            </th>
            <th>
                Action
            </th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>
                {{$order->name}}
            </td>
            <td>
                {{$order->email}}
            </td>
            <td>
                {{$order->type_of_cake}}
            </td>
            <td>
                {{$order->celebration_type}}
            </td>
            <td>
                {{$order->dream_cake}}
            </td>
            <td>
                <a href="javascript:;" class="btn btn-default done" data-order_id='{{ $order->id }}'>Done</a>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="alert alert-danger">
        <h3>No Orders!</h3>
    </div>
    @endif
@stop

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('.done').click(function(e){
            e.preventDefault();
            
            var order_id = $(this).data('order_id');
            var me = $(this);
            $.ajax({
                url: '/cake/orders/'+order_id,
                data: {
                    "_token": "{{ csrf_token()}}"
                },
                type: 'post',
                success: function(status){
                    if (status) {
                        me.parents('tr').remove();
                    }
                }
            })
        })
    })
</script>
@stop
