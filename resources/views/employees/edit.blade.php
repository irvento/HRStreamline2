<form action="{{ route('employees.update', $employee->employee_id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $employee->name }}" required>

    <label for="employee_fname">First Name</label>
    <input type="text" name="employee_fname" id="employee_fname" value="{{ $employee->employee_fname }}" required>

    <!-- Other fields -->

    <button type="submit">Update Employee</button>
</form>
