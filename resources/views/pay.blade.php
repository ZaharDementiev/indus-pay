@extends('layouts.pay')
@section('content')
                <a href="{{route('indus')}}" class="header__lang">
                    <img src="/img/lang.svg" alt="">
                    <span>Pay</span>
                </a>
                <div class="header__title">Payment #01</div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <div class="container">
            <div class="pay-page">
                <h2>SELECT AN OPTION TO PAY </h2>
                <div class="form">
                    <div class="form__listRadio">
                        <div class="form__radio">
                            <input type="radio" class="radio" id="radio" checked/>
                            <label for="radio">
                                <span class="title">Bank transfer</span>
                            </label>
                        </div>
                    </div>
                    <div class="step steps-1 active" id="step-1">
                        <div class="step__title">
                            Send money  to the our actual Bank account. Click on the "Next" and enter the transaction ID.
                        </div>
                        <div class="form__group">
                            <label>Account No:</label>
                            <input type="text" value="" readonly>
                            <div class="copy">Copy</div>
                        </div>
                        <div class="form__group">
                            <label>IFSC Code:</label>
                            <input type="text" value="" readonly>
                            <div class="copy">Copy</div>
                        </div>
                        <div class="btn-next">Next</div>
                        <div class="open-video">
                            How to make a payment
                        </div>
                    </div>
                    <div class="step steps-2" id="step-2">
                        <form action="{{route('pay.submit')}}" method="post">
                            @csrf
{{--                            @if($account != null)--}}
                                <input type="hidden" name="user_id" value="">
{{--                            @endif--}}
                            <div class="step__title">
                                Specify Transaction ID. Money will be credited to the account immediately. If your transaction is not found, please try again in a few minutes.
                            </div>
                            <div class="form__group">
                                <label>Amount:</label>
                                <input name="amount" type="number" placeholder="Enter the amount you sent" id="amount" >
                                <div class="lebl error">Transaction not found.</div>
                                <div class="lebl warning">Please wait 8s...</div>
                                <div class="lebl success">You have successfully paid the invoice</div>
                            </div>
                            <div class="form__group">
                                <label>Transaction ID:</label>
                                <input name="code" type="number" placeholder="919682237229" id="trans_id" >
                                <div class="lebl error">Transaction not found.</div>
                                <div class="lebl warning">Please wait 8s...</div>
                                <div class="lebl success">You have successfully paid the invoice</div>
                            </div>
                            <div class="buttons">
                                <div class="btn-back">
                                    <svg width="16" height="26" viewBox="0 0 16 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.29024 13.0055L15.3151 3.27854C15.5912 3.01135 15.743 2.65411 15.743 2.2732C15.743 1.89208 15.5912 1.53506 15.3151 1.26745L14.4367 0.415577C14.1611 0.147545 13.7927 0 13.4001 0C13.0075 0 12.6395 0.147545 12.3637 0.415577L0.42746 11.9964C0.150551 12.2648 -0.00108349 12.6235 5.83693e-06 13.0049C-0.00108349 13.3879 0.150334 13.7462 0.42746 14.0148L12.3526 25.5844C12.6284 25.8525 12.9964 26 13.3892 26C13.7818 26 14.1498 25.8525 14.4258 25.5844L15.304 24.7326C15.8755 24.1781 15.8755 23.2755 15.304 22.7213L5.29024 13.0055Z" fill="#00B9F5"/>
                                    </svg>
                                </div>
{{--                                <button type="submit" id="formStart" @if($account == null) disabled @endif>Confirm</button>--}}
                            </div>
                            <div class="help-img">
                                <img src="/img/help-pay.png" alt="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popups" id="popupsVideo">
        <div class="popups__bgClose"></div>
        <div class="popups__content">
            <iframe src="https://www.youtube.com/embed/p-qnsZhQ_iI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="close">Cancel</div>
        </div>
    </div>
@endsection
