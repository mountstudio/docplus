<div class="modal fade" id="doctorrecordModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/noavatar.png') }}" alt="">
                                    </div>
                                    <div class="row justify-content-center">
                                        @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                                    </div></div>

                                <div class="col">
                                    <a href="{{ route('doctor.show', $doctor->id) }}">
                                        <p class="text-secondary h3 m-0 mb-md-2 font-weight-bold">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</p>
                                    </a>

                                    <p class="text-secondary font-weight-light h6 my-3"><em>
                                            @if(isset($doctor))
                                                {{ $doctor->specs->implode('name', ', ') }}
                                            @else
                                                Гастроэнтеролог, Терапевт
                                            @endif <br> Стаж {{ $doctor->age ?? 19 }} лет</em></p>
                                    <p class="text-secondary font-weight-light m-0 mb-md-2">
                                        Приём от
                                        @if($doctor->discount)
                                            <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>
                                            <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                                        @else
                                            <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                                        @endif
                                        <i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка указана за первое посещение врача"></i>
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="text-secondary" action="{{route('record.store')}}" method="POST">
                        @csrf
                        @if($doctor->specs->count() != 0)
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Специальность: </label>
                            <select class="ml-5" name="spec_id">
                                @foreach($doctor->specs as $spec)
                                    <option value="{{$spec->id}}">{{ $spec->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        @if($doctor->clinics->count() != 0)
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Клиника: </label>
                                <select class="ml-5" name="doctor_clinic_id">
                                    @foreach($doctor->clinics as $clinic)
                                        <option value="{{$clinic->id}}">{{ $clinic->name }}</option>
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
                        <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">

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