@extends('layouts.app')

@section('content')

<?php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

?>

<div class="row">
    <div class="col-lg-12 text-center">
        @if ($message = Session::get('success'))

        <div class="flex items-center justify-between p-4 text-green-700 border rounded border-green-900/10 bg-green-50" role="alert">
            <strong class="text-sm font-medium"> {{ $message }} </strong>

            <button class="close" data-dismiss="alert" class="opacity-90" type="button">
                <span class="sr-only"> Close </span>

                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>


        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br>
        @endif

        @if ( Request::get('itemName') )
        <div class="flex items-center justify-between p-4 text-red-700 border rounded border-red-900/10 bg-red-50" role="alert">
            @if (Request::get('itemQty') <= 0 ) <strong class="text-sm font-medium"> {{ Request::get('itemName') }} is sold out, please remove it in order to continue purchase </strong>
                @else
                <strong class="text-sm font-medium">Unfortunately, only {{Request::get('itemQty')}} <span class="opacity-75">'{{ Request::get('itemName') }}'</span> left!</strong>
                @endif


                <button class="close" data-dismiss="alert" class="opacity-90" type="button">
                    <span class="sr-only"> Close </span>

                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
        </div>
        @endif
    </div>
</div>

<section>
    <h1 class="sr-only">Checkout</h1>

    <div class="relative mx-auto max-w-screen-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="py-12 bg-gray-50 md:py-24">
                <div class="max-w-lg px-4 mx-auto lg:px-8">
                    <div class="flex items-center">
                        <span class="w-10 h-10 bg-green-300 rounded"></span>

                        <h2 class="ml-4 font-medium">Shopping Cart</h2>
                    </div>

                    @if ($cart !== null) <div class="mt-8">
                        <p class="text-2xl font-medium tracking-tight">€{{number_format($totalPrice / 100,2)}}</p>
                        <p class="mt-1 text-sm text-gray-500">Products in the shopping cart:</p>
                    </div>

                    <div class="mt-12">
                        <div class="flow-root">
                            <ul class="-my-4 divide-y divide-gray-200">
                                @foreach ($cart as $item)

                                <li class="flex py-6">
                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border bg-gray-50 border-gray-200">
                                        <img src="{{ asset('images/products/' . $item['item']->image_path) }}" alt="{{ $item['item']['name'] }}" class="h-full w-full object-contain p-2 object-center">
                                    </div>

                                    <div class="ml-4 flex flex-1 flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3>
                                                    <a href="#"> {{Str::limit( $item['item']['name'] , 42)}} </a>
                                                </h3>
                                                <p class="ml-4 whitespace-nowrap">€ {{ number_format($item['item']['price'] / 100,2) }}</p>
                                            </div>
                                            @if ( Request::get('itemId') == $item['item']->id )


                                            @if (Request::get('itemQty') <= 0 ) <p class="text-red-400 text-xs">This item is out of stock</p>
                                                @else
                                                <p class="text-red-400 text-xs">Only {{Request::get('itemQty')}} left!</p>

                                                @endif
                                                @endif
                                                <p class="mt-1 text-sm text-gray-500">{{ $item['item']['color'] }}</p>


                                        </div>

                                        <div class="flex flex-1 items-end justify-between text-sm">
                                            <!-- component -->
                                            <div class="custom-number-input h-10 w-32 scale-90 origin-left">
                                                <form action="{{ route('cart.update', ['id' => $item['item']->id]) }}" method="post">
                                                    @csrf
                                                    <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                                        <button data-action="decrement" class=" bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                            <span class="m-auto text-2xl font-thin">−</span>
                                                        </button>
                                                        <input type="number" class="outline-none border-transparent focus:outline-none text-center w-full bg-gray-50 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="choosedQty" value="{{ $item['qty'] }}"></input>
                                                        <button data-action="increment" class="bg-gray-200 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                            <span class="m-auto text-2xl font-thin">+</span>
                                                        </button>
                                                        <!-- <p class="text-gray-400"> {{ $item['qty'] }} Qty.</p> -->
                                                    </div>
                                                </form>




                                                <style>
                                                    input[type='number']::-webkit-inner-spin-button,
                                                    input[type='number']::-webkit-outer-spin-button {
                                                        -webkit-appearance: none;
                                                        margin: 0;
                                                    }

                                                    .custom-number-input input:focus {
                                                        outline: none !important;
                                                    }

                                                    .custom-number-input button:focus {
                                                        outline: none !important;
                                                    }
                                                </style>


                                            </div>
                                            <!-- <p class="text-gray-400"> {{ $item['qty'] }} Qty.</p> -->

                                            <div class="flex">
                                                <form action="{{ route('cart.remove', ['id' => $item['item']['id']]) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="font-medium text-red-600 hover:text-red-500">Remove</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                    @else

                    <p class="mt-6 text-gray-400">Shopping cart is empty</p>

                    @endif


                </div>
            </div>


            <!-- vartotojo form -->

            <div class="py-12 bg-white md:py-24">
                <div class="max-w-lg px-4 mx-auto lg:px-8">
                    @if ($cart !== null)
                    <form class="grid grid-cols-6 gap-4">
                        @csrf
                        <!-- <div class="col-span-3">
                            <label class="block mb-1 text-sm text-gray-600" for="first_name">
                                Vardas
                            </label>

                            <input required name="firstName" class="rounded shadow-sm border-gray-200 w-full text-sm p-2.5" type="text" id="frst_name" />
                        </div>

                        <div class="col-span-3">
                            <label class="block mb-1 text-sm text-gray-600" for="last_name">
                                Pavardė
                            </label>

                            <input required name="secondName" class="rounded shadow-sm border-gray-200 w-full text-sm p-2.5" type="text" id="last_name" />
                        </div> -->

                        <div class="col-span-6">
                            <label class="block mb-1 text-sm text-gray-600" for="email">
                                Email
                            </label>

                            <input placeholder="" value="{{ old('email') }}" required name="email" class="rounded shadow-sm border-gray-200 w-full text-sm p-2.5" type="email" id="customer_email" />
                        </div>

                        <!-- <div class="col-span-6">

                            <label class="block mb-1 text-sm text-gray-600" for="phone">
                                Telefonas
                            </label>
                            <div class="mt-2 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l border border-r-0 border-gray-300 bg-gray-50 text-gray-400 text-xs"> +370 </span>
                                <input required maxlength="6" type="text" name="telephone" id="number" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 placeholder:text-gray-300" placeholder="12345678">
                            </div>
                        </div>

                        <fieldset class="col-span-6">
                            <legend class="block mb-1 text-sm text-gray-600">
                                Jūsu adresas
                            </legend>

                            <div class="-space-y-px bg-white rounded shadow-sm">
                                <div>
                                    <label class="sr-only" for="country">Jūsu adresas</label>

                                    <select class="border-gray-200 relative rounded-t w-full focus:z-10 text-sm p-2.5" id="country" name="country" autocomplete="country-name">
                                        <option>Lithuania</option>
                                        @foreach ($countries as $country)
                                        <option>{{ $country }}</option>
                                        @endforeach
                                      
                                    </select>
                                </div>

                                <div>
                                    <label class=" sr-only" for="postal-code">
                                        Miestas
                                    </label>

                                    <input required value="{{ old('city') }}" class="border-gray-200 relative rounded-b w-full focus:z-10 text-sm p-2.5 placeholder-gray-400" type="text" name="city" id="city" autocomplete="city" placeholder="Miestas" />
                                </div>

                                <div>
                                    <label class="sr-only" for="postal-code">
                                        Gatvė, namo numeris
                                    </label>

                                    <input required class="border-gray-200 relative rounded-b w-full focus:z-10 text-sm p-2.5 placeholder-gray-400" type="text" name="street" id="street" autocomplete="street" placeholder="Gatvė, namo numeris" />
                                </div>


                            </div>



                            <label class="sr-only" for="country">Pašto kodas</label>
                            <div class="mt-2 flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l border border-r-0 border-gray-300 bg-gray-50 text-gray-400 text-xs"> LT - </span>
                                <input required maxlength="6" type="text" name="postalCode" id="postalCode" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 placeholder:text-gray-300" placeholder="12345">
                            </div>
                        </fieldset> -->

                        <fieldset class="relative w-full col-span-6 mt-2">

                            <div class="flex justify-between mb-2">
                                <p class="font-bold">Total:</p>
                                <div class="flex">
                                    <p class="text-gray-800 mr-2 font-bold">€{{number_format($totalPrice / 100 + 10,2)}}</p>
                                    <p class="text-gray-400 text-xs py-1">( Shipping fee €{{ number_format(10, 2)}} ) </p>
                                </div>
                            </div>

                        </fieldset>


                        <div class="relative col-span-6 text-xs w-full items-center">
                            <input required id="link-checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <p class="inline ml-1">I've read and agree with <a class="text-blue-500 hover:text-blue-400" href="{{ route('info.purchases') }}">Terms&Agreements</a></p>
                        </div>

                        <input type="hidden" id="stripe_publishable" value="{{env('STRIPE_PUBLISHABLE')}}">



                        <div>
                            <div class="form-group">

                                <div class="">
                                    <input class="form-control" id="amount" type="hidden" name="amount" value="{{number_format($totalPrice,2)}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="stripe_publishable" value="{{env('STRIPE_PUBLISHABLE')}}">

                        <div class="col-span-6">
                            <button onclick="loadingStripe()" type="submit" id="donate" class="rounded bg-black text-sm p-2.5 text-white w-full block font-semibold uppercase gray-300 hover:bg-gray-800 duration-200 transition">
                                <i id="payloadingicon" class="opacity-0 fa-solid fa-circle-notch animate-spin text-white"></i>
                                <span id="payicon" class="mr-2"><i class="fas fa-donate">

                                    </i></span>Pay</button>
                        </div>


                    </form>
                    @endif
                </div>

            </div>

        </div>
    </div>
</section>


@endsection


@section('extra-js')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//js.stripe.com/v3/"></script>
<script src="/checkout.js"></script>

@endsection