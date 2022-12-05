<p>Hello</p>

<p>Please find the registration details for {{ $_name }}</p>

<table>

    <tr>
        <td><b>First name(s)</b></td>
        <td>{{ $_candidate->first_name }}</td>
    </tr>

    <tr>
        <td><b>Last name</b></td>
        <td>{{ $_candidate->last_name }}</td>
    </tr>

    <tr>
        <td><b>Email address</b></td>
        <td>{{ $_candidate->email }}</td>
    </tr>

    <tr>
        <td><b>National ID number</b></td>
        <td>{{ $_candidate->id_number }}</td>
    </tr>

    <tr>
        <td><b>Date of birth</b></td>
        <td>{{ $_candidate->dob }}</td>
    </tr>

    <tr>
        <td><b>Gender</b></td>
        <td>{{ $_candidate->gender }}</td>
    </tr>

</table>

<p>
    Please find the attached resume for the candidate s
</p>

<p>
    Regards
</p>
