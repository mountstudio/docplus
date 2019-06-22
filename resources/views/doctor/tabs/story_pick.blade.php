<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="" data-toggle="tab" href="#story_doctor_record" role="tab" aria-controls="" aria-selected="true">История записей</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#story_doctor_feedback" role="tab" aria-controls="" aria-selected="true">История отзывов</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade active show" id="story_doctor_record" role="tabpanel" aria-labelledby="">@include('doctor.tabs.story_record',['records' => \App\Doctor::getRecord($doctor)])</div>
        <div class="tab-pane fade" id="story_doctor_feedback" role="tabpanel" aria-labelledby="">@include('doctor.tabs.story_feedback',['feedbacks' => $doctor->feedbacks])</div>
    </div>
</div>