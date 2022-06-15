@if(count($articles) > 0)
<form action="{{mob_route('billing')}}" method="post" id="command-form">
    @csrf
<div class="wishlist-item">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__('Action')}}</th>
            <th scope="col">{{__('Image')}}</th>
            <th scope="col">{{__('Produit')}}</th>
            <th scope="col">{{__('Quantité')}}</th>
            <th scope="col">{{__('Price')}}</th>
            <th scope="col">{{__('Totale')}}</th>
        </tr>
        </thead>
        <tbody>
        @php $i = 0; $index = 0; $totalQuantity = 0; $total = 0; @endphp
        @foreach($articles as $article)
            @php $i++ @endphp
            <tr>
                <td><a class="trash" href="#" style="font-size: 28px; color: red; " data-index="{{$index}}" data-item="{{$article->code}}"><i class='bx bx-trash'></i></a></td>
                <td><img style="width: 15%;" src="{{asset('frontend/images/shop/'. json_decode(getTableByAttribute('product','code',$article->code,true)->image)[0])}}" alt="Product"></td>
                <td><input type="hidden" name="line[row{{$i}}][]" value="{{$article->code}}">{{$article->label}}</td>
                <td><input class="form-control input-quantity"  value="{{$article->quantity}}" data-index="{{$index}}" data-selling_price="{{$article->price}}" data-item="{{$article->code}}" type="number"  step="any" min="1" style="text-align:center"  name="line[row{{$i}}][]" required></td>
                <td><span data-index="{{$index}}">{{$article->price}}</span> XAF</td>
                <td>{{$article->quantity*$article->price}} XAF</td>
            </tr>
            @php $index++;  $total += $article->quantity*$article->price; $totalQuantity += $article->quantity; @endphp
        @endforeach

        <tr>
            <td colspan="5">{{__('G. Totale')}}</td>
            <td ><span>{{$total}}</span> XAF</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                    <div class="billing">
                        <h3>{!! __('Détails de la facturation') !!}</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{!! __('Prénom*') !!}</label>
                                    <input type="text" class="form-control" name="surname" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{!! __('Nom*') !!}</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{!! __('Email*') !!}</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{!! __('Téléphone*') !!}</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{!! __('Addresse*') !!}</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="summery">
                    <h3>{!! __('Resume de la commande') !!}</h3>
                    <ul>
                        <li>
                            {!! __('Quantité Total') !!}:
                            <span>{{$totalQuantity}}</span>
                        </li>
                        <li>
                            {!! __('Grand Total') !!}:
                            <span>{{$total .'F CFA'}}</span>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  id="closeModal">{{__('Fermer')}}</button>
                <button type="submit" class="btn btn-primary" id="passCommand">{!! __('Passez la commande') !!}</button>
            </div>
        </div>
    </div>
</div>
</form>
@else
    <div class="col-12" style="text-align: center;">
        {!! __('Le panier est vide') !!}
    </div>
@endif
