<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#doctor_likes" role="tab" aria-controls="" aria-selected="true">Врачи</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#clinic_likes" role="tab" aria-controls="" aria-selected="true">Клиники</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade active show" id="doctor_likes" role="tabpanel" aria-labelledby="">@include('user.tabs.likes', ['likes' => $doctor_likes])</div>
        <div class="tab-pane fade" id="clinic_likes" role="tabpanel" aria-labelledby="">@include('user.tabs.likes', ['likes' => $clinic_likes])</div>
    </div>
</div>