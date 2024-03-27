<div>

    <div class="alert alert-danger msgCall" style="display: none">Խնդրում ենք լրացնել դաշտը</div>
        <div class="alert alert-success d-none alertSuccess" role="alert">
            Ձեր պատվերը ընդունված է!
        </div>
    <form class="form-group" action="{{route('item.reg')}}" method="post" onsubmit="onsubmitFunc(event)">
        @csrf

        <label for="newsletter-newsletter" class="d-none"></label>
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputName">Անուն</label>
                <input type="text" name="name" class="form-control"
                       id="inputName" placeholder="Մուտքագրեք ձեր անունը">

           <span class="error nameError{{$type_id}}"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputPhone">Հեռախոսահմար</label>
                <input type="text" name="phone"
                       class="form-control" id="" placeholder="Մուտքագրեք ձեր հեռախոսահամարը">
                <span class="error phoneError{{$type_id}}"></span>


            </div>
        </div>


        <input type="hidden" name="item_id" value="{{$item_id}}">
        <input type="hidden" name="type_id" value="{{$type_id}}">

        <button class="btn button btn-blue orderby " style="white-space: nowrap">Պատվիրել <i
                class="fa fa-cart-plus"></i></button>


    </form>

</div>
<script>
    function onsubmitFunc(e) {
        e.preventDefault()
        const armenianPhoneNumberRegex = /^(?:\+\d+)?[\d\s-]+$/;
        const fullNameRegex = /^([A-Za-z]+|[Ա-Ֆա-ֆ]+)(?: ([A-Za-z]+|[Ա-Ֆա-ֆ]+))?$/;

        let msgCall = document.querySelector('.msgCall')




        const isValid = armenianPhoneNumberRegex.test(e.target.elements.phone.value);
        const isValidName = fullNameRegex.test(e.target.elements.name.value);

        if (!isValid) {
            document.querySelector('.phoneError{{$type_id}}').innerHTML = 'Սխալ: Հեռախոսահամարը պետք է պարունակի միայն թվեր, առանց նշանների, ու առանց բացատների';
        } else {
            document.querySelector('.phoneError{{$type_id}}').innerHTML = '';
        }

        if (!isValidName) {
            document.querySelector('.nameError{{$type_id}}').innerHTML = 'Սխալ: Անունը և ազգանունը պետք է պարունակեն միայն տառեր:.';
        } else {
            document.querySelector('.nameError{{$type_id}}').innerHTML = '';
        }
        if (isValid && isValidName) {
            document.querySelector('.alertSuccess').classList.remove('d-none')
          setTimeout(()=>{
              e.target.submit()
          },2000)
        }else{

        }





    }
</script>
