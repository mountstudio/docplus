<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#feedback_confirm" role="tab" aria-controls="" aria-selected="true">Отзывы</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade active show" id="feedback_confirm" role="tabpanel" aria-labelledby="">
            <div class="container d-none d-md-block py-4" id="feedbacks">
                @if($feedbacks->count() === 0)
                    <p>Нет новый отзывов на рассмотрение</p>
                @else
                @foreach($feedbacks as $feedback)
                    @include('operator.tabs.feedback_confirm')
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>