@foreach($likes as $like)
    @includeWhen($like->likeable_type === 'App\Doctor' , 'doctor.card' , ['doctor' => $like->likeable])
    @includeWhen($like->likeable_type === 'App\Clinic' , 'clinic.card' , ['clinic' => $like->likeable])
@endforeach