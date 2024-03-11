<div>
    @if(session()->has('success'))
        <div class="alert alert-success">Գրանցումը հաջողությամբ ընթացավ</div>
    @endif
        <div class="alert alert-danger msgCall" style="display: none">Խնդրում ենք լրացնել դաշտը</div>
    <div class="count-down-form formway">
        <form class="form-group" action="{{route('item.reg')}}" method="post" onsubmit="onsubmitFunc(event)">
            @csrf

            <label for="newsletter-newsletter" class="d-none"></label>
            <div class="email-placeholder">
                <input type="tel"
                       class="form-control form-placeholder"  name="phone" value="+374"
                       required
                >

                @error('phone') <span class="error">{{ $message }}</span> @enderror


                <input type="hidden" name="item_id"  value="{{$item_id}}">
                <input type="hidden"  name="type_id"  value="{{$type_id}}">

                <button class="btn button btn-blue orderby "  style="white-space: nowrap">Պատվիրել <i
                        class="fa fa-cart-plus"></i></button>

            </div>
        </form>
    </div>
</div>
<script>
    function onsubmitFunc(e){
        let msgCall=document.querySelector('.msgCall')
        e.preventDefault()
        if(e.target.elements.phone.value.length<9){
            msgCall.style.display='block'
        }else{
            e.target.submit()
        }

      // if(  e.elements.phone.value){
      //
      // }
    }
</script>
