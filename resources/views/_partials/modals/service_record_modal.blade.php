<div class="modal fade" id="servicerecordModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="exampleModalLabel">Запись на прием</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="row align-items-start">
                                <div class="col-5 text-center">
                                    <div class="position-relative">
                                        <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $clinic->logo ? asset('uploads/'.$clinic->logo) : asset('img/noavatar.png') }}" alt="">
                                    </div>
                                    <div class="row justify-content-center">
                                        @include('_partials.stars', ['id' => $clinic->id.'-clinic'])
                                    </div></div>

                                <div class="col">
                                    <a href="{{ route('clinic.show', $clinic->id) }}">
                                        <p class="text-secondary h3 m-0 mb-md-2 font-weight-bold">{{ $clinic->name ?? 'Бобров Василий Елисеевич' }}</p>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="text-secondary mt-4" action="{{route('record.store')}}" method="POST">
                        @csrf
                        @if($clinic->services->count() != 0)
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Услуга: </label>
                            <select class="ml-5" name="service_id">
                                @foreach($clinic->services as $service)
                                    <option value="{{$service->id}}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше имя" value="{{ Auth::check() ? Auth::user()->name : '' }}" required {{ Auth::check() ? 'disabled' : '' }}>
                            @auth
                                <input type="hidden" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            @endauth
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите вашу фамилию:</label>
                            <input type="text" name="lastname" class="form-control" id="recipient-lastname" placeholder="Ваша фамилия" required>
                            <input type="hidden" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}" required>
                        </div>
                        <input type="hidden" name="schedule_id" id="schedule_id">
                        <input type="hidden" name="clinic_id" id="clinic_id" value="{{$clinic->id}}">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                            <input type="tel" name="phone_number" class="form-control" placeholder="Номер телефона">
                        </div>
                        <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-success my-4">Отправить</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>