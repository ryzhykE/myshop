@extends('layouts.main')

@section('title')
    Home page
@endsection

@section('header')
    @include('partials.header')
@endsection


@section('content')

    <div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title">
                    <h3>Заказ</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-checkout">
                            {!! Form::open(['url' => url('checkout'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

                            @include('includes.errors')

                            <h2 class="form-signin-heading">Please register</h2>

                            <label for="inputFirstName" class="sr-only">First name</label>
                            {!! Form::text('first_name', null, [
                                'class'                         => 'form-control',
                                'placeholder'                   => 'First name',
                                'required',
                                'id'                            => 'inputFirstName',
                                'data-parsley-required-message' => 'First Name is required',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                'data-parsley-minlength'        => '2',
                                'data-parsley-maxlength'        => '32'
                            ]) !!}

                            <label for="inputLastName" class="sr-only">Last name</label>
                            {!! Form::text('last_name', null, [
                                'class'                         => 'form-control',
                                'placeholder'                   => 'Last name',
                                'required',
                                'id'                            => 'inputLastName',
                                'data-parsley-required-message' => 'Last Name is required',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                'data-parsley-minlength'        => '2',
                                'data-parsley-maxlength'        => '32'
                            ]) !!}


                            <label for="inputTown" class="sr-only">Town</label>
                            {!! Form::text('town', null, [
                                'class'                         => 'form-control',
                                'placeholder'                   => 'Town',
                                'required',
                                'id'                            => 'inputTown',
                                'data-parsley-required-message' => 'Town is required',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
                                'data-parsley-minlength'        => '2',
                                'data-parsley-maxlength'        => '32'
                            ]) !!}

                            <label for="inputPhone" class="sr-only">Town</label>
                            {!! Form::text('phone', null, [
                                'class'                         => 'form-control',
                                'placeholder'                   => 'Phone',
                                'required',
                                'id'                            => 'inputPhone',
                                'data-parsley-required-message' => 'Phone is required',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-pattern'          => '^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$',
                                'data-parsley-minlength'        => '10',
                                'data-parsley-maxlength'        => '22'
                            ]) !!}

                            {{ csrf_field() }}

                            <button class="button btn-primary medium">Отправить</button>

                            {!! Form::close() !!}
                        </div>

                        <div class="form-checkout order">
                            <table class="shop-table order">
                                <tr class="order-total">
                                    <td class="subtotal">Всего</td>
                                    <td class="total"><span class="price">${{ $total }} грн.</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

    {!! HTML::script('/assets/plugins/parsley.min.js') !!}

@stop

