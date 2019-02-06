<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ \Carbon\Carbon::now()->format('d M') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{ \Carbon\Carbon::now() }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
    </li>
</ul>
<p class="text-center text-secondary font-weight-bold pt-3">
    Выберите время приема для записи онлайн
</p>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">@include('schedule.show')</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">@include('schedule.show')</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">@include('schedule.show')</div>
</div>
