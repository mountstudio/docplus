<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#story_record" role="tab" aria-controls="" aria-selected="true">История записей</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="" data-toggle="tab" href="#story_likes" role="tab" aria-controls="" aria-selected="true">Понравившиеся врачи и клиники</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade active show" id="story_record" role="tabpanel" aria-labelledby="">@include('user.tabs.records', ['records' => \App\User::getRecord($user)])</div>
        <div class="tab-pane fade" id="story_likes" role="tabpanel" aria-labelledby="">@include('user.tabs.like_tabs')</div>
    </div>
</div>