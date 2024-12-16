<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <label for="employee_fname">First Name</label>
    <input type="text" name="employee_fname" id="employee_fname" required>

    <!-- Add other fields as necessary -->

    <button type="submit">Create Employee</button>
</form>
