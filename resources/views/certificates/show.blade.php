<x-app-layout class="">

@section('content')  
    <div class="container mx-auto mt-5">  
        <h1 class="text-xl font-bold">Certificate Details</h1>  

        <div>  
            <label>Certificate ID:</label>  
            <p>{{ $certificate->certificate_id }}</p>  
        </div>  
        <div>  
            <label>Employee Name:</label>  
            <p>{{ $certificate->employee->employee_fname }} {{ $certificate->employee->employee_lname }}</p>  
        </div>  
        <div>  
            <label>Certificate Name:</label>  
            <p>{{ $certificate->certificate_name }}</p>  
        </div>  
        <div>  
            <label>Issued By:</label>  
            <p>{{ $certificate->issued_by }}</p>  
        </div>  
        <div>  
            <label>Issue Date:</label>  
            <p>{{ $certificate->issue_date }}</p>  
        </div>  
        <div>  
            <label>Expiry Date:</label>  
            <p>{{ $certificate->expiry_date }}</p>  
        </div>  
    </div>  
</x-app-layout>