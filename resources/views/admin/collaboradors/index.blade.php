@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">All Employees</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="../../index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Employee</a>
                        </li>
                        <li class="breadcrumb-item active">All Employees</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>All</strong> Employees
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle"
                                    data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-end">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table id="basicTable"
                            class="table table-hover table-checkable order-column contact_list">
                                <thead>
                                    <tr>
                                        <th class="center">Codigo de colaborador</th>
                                        <th class="center">imagen</th>
                                        <th class="center"> Tipo de documento </th>
                                        <th class="center"> Numero </th>
                                        <th class="center"> Nombres y Apellidos </th>
                                        <th class="center"> Sexo </th>
                                        <th class="center"> Cargo </th>
                                        <th class="center">Regimen Pensionario</th>
                                        <th class="center"> EPS </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user1.jpg" alt="">
                                        </td>
                                        <td class="center">Rajesh</td>
                                        <td class="center">Programmer</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">22 Feb 2000</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user2.jpg" alt="">
                                        </td>
                                        <td class="center">Pooja Patel</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">27 Aug 2005</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user3.jpg" alt="">
                                        </td>
                                        <td class="center">Sarah Smith</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">05 Jun 2011</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user4.jpg" alt="">
                                        </td>
                                        <td class="center">John Deo</td>
                                        <td class="center">Designer</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">15 Feb 2012</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user5.jpg" alt="">
                                        </td>
                                        <td class="center">Jay Soni</td>
                                        <td class="center">Purchase Officer</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">12 Nov 2012</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user6.jpg" alt="">
                                        </td>
                                        <td class="center">Jacob Ryan</td>
                                        <td class="center">Receptionist</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">03 Dec 2001</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user7.jpg" alt="">
                                        </td>
                                        <td class="center">Megha Trivedi</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">17 Mar 2013</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user8.jpg" alt="">
                                        </td>
                                        <td class="center">Rajesh</td>
                                        <td class="center">Sr. Tester</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">22 Feb 2000</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user9.jpg" alt="">
                                        </td>
                                        <td class="center">Pooja Patel</td>
                                        <td class="center">Team Leader</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">27 Aug 2005</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user6.jpg" alt="">
                                        </td>
                                        <td class="center">Sarah Smith</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">05 Jun 2011</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user5.jpg" alt="">
                                        </td>
                                        <td class="center">Jacob Ryan</td>
                                        <td class="center">Receptionist</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">03 Dec 2001</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user4.jpg" alt="">
                                        </td>
                                        <td class="center">Megha Trivedi</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">17 Mar 2013</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user3.jpg" alt="">
                                        </td>
                                        <td class="center">Rajesh</td>
                                        <td class="center">Director</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">22 Feb 2000</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user2.jpg" alt="">
                                        </td>
                                        <td class="center">Pooja Patel</td>
                                        <td class="center">Programmer</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">27 Aug 2005</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td class="table-img center">
                                            <img src="../../assets/images/user/user1.jpg" alt="">
                                        </td>
                                        <td class="center">Sarah Smith</td>
                                        <td class="center">Manager</td>
                                        <td class="center">+ 167-894-2378</td>
                                        <td class="center">example@email.com</td>
                                        <td class="center">22,tilak appt. surat</td>
                                        <td class="center">05 Jun 2011</td>
                                        <td class="center">
                                            <a href="edit-employee.html" class="btn btn-tbl-edit">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <a href="" class="btn btn-tbl-delete">
                                                <i class="material-icons">delete_forever</i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="center"> Name </th>
                                        <th class="center"> Designation </th>
                                        <th class="center"> Mobile </th>
                                        <th class="center"> Email </th>
                                        <th class="center"> Address </th>
                                        <th class="center">Joining Date</th>
                                        <th class="center"> Action </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
