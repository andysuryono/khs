
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>
.special{
    font-weight: bold;
}
.body-class{
    letter-spacing: 1px;
    font-family: sans-serif;
    border:2px solid cornflowerblue;
    padding: 50px;
    font-size: 15px;
}
.table_score {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    font-size: 12px;
    width: 100%;
}

.table_score td, .table_score th {
    border: 1px solid #ddd;
    font-size: 12px;
    padding: 8px;
}

.table_score tr:nth-child(even){background-color: #f2f2f2;}

.table_score tr:hover {background-color: #ddd;}
.table_score th{
    padding: 5px;
    background-color: #6999ee;
    text-align: center;
}
.bronze{
    color : #cd7f32;
}
.silver{
    color :rgb(192,192,192);

}
.gold{
    color :rgb(207,181,59);
}
.checked {
    color: orange;
}
</style>
<body name="body">
    <p style="text-align: center;"><strong><br></strong></p>
    <table width="100%" class="table table-bordered">
        <tbody>
            <tr>
                <td><img src="{{ public_path('img/stimik.jpeg')  }}" width="100" height="100">
                </td>
                <td align="center">
                    <p style="text-align: center;"><strong>SEKOLAH TINGGI MANAGEMENT INFORMATIKA</strong>
                    </p>
                    <p>  
                    </p>
                    <h1 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); text-align: center;"><strong>MUHAMMADIYAH JAKARTA</strong>
                    </h1>
                    <h1 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); text-align: center;">
                        <strong style="color: rgb(107, 113, 122); font-size: 13px;">SEKOLAH TINGGI MANAGEMENT INFORMATIKA</strong>
                    </h1>
                    <h1 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); text-align: center;"><strong style="color: rgb(107, 113, 122); font-size: 13px;">Jl. Kelapa Dua Wetan No. 17 Ciracas - Jakarta timur</strong>
                    </h1> 
                    <h1 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); text-align: center;"><strong style="color: rgb(107, 113, 122); font-size: 13px;">http://www.stmikmj.ac.id - Email : stimikmuhjkt@gmail.com </strong>
                    </h1>
                    <h1 style="font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(0, 0, 0); text-align: center;"><strong style="color: rgb(107, 113, 122); font-size: 13px;">Telp. 021-87717489 / 021-87717490 </strong>
                    </h1>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p style="text-align: center; ">KARTU HASIL STUDI</p>
<table width="100%" class="table table-bordered" style="padding: 30px">
    <tbody width="100%" >
        <tr>
            <td>NIM &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;:&nbsp;&nbsp;&nbsp;{{ $mahasiswa->nim }}</td>
            <td align="right">JURUSAN &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{{ $mahasiswa->jurusan->nama }}</td>
        </tr>
        <tr>
            <td>NAMA&nbsp; &nbsp; &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; <span class="special">{{ $mahasiswa->nama }}</span></td>
            <td align="right">SEMESTER &nbsp; &nbsp; &nbsp;&nbsp;:  &nbsp;&nbsp;&nbsp;Semua Semester&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
    </tbody>
</table>
 <table class="table_score" cellpadding="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="5%">NO.</th>
                                <th width="15%">KODE MK</th>
                                <th width="40%">NAMA MATA KULIAH</th>
                                <th width="23%">SKS</th>
                                <th width="23%">NILAI</th>
                                <th width="23%">MUTU</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studies as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ $row['kode'] }}</td>
                                <td>{{ $row['matakuliah'] }}</td>
                                <td style="text-align: center;">{{ $row['sks'] }}</td>
                                    @if($row['nilai'] == 8 )
                                        <td style="text-align: center;">A</td>
                                    @elseif($row['nilai'] == 6 )
                                        <td style="text-align: center;">B</td>
                                    @elseif($row['nilai'] == 4 )
                                        <td style="text-align: center;">C</td>
                                    @elseif($row['nilai'] == 2 )
                                        <td style="text-align: center;">D</td>
                                    @elseif($row['nilai'] == 0 )
                                        <td style="text-align: center;">E</td>
                                    @endif
                                <td style="text-align: center;">{{ $row['nilai'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                            <tr>
                                <th colspan="3" width="40%">JUMLAH SKS</th>
                                <th width="23%">{{$data['jumlah_sks']}}</th>
                                <th width="23%"></th>
                                <th width="23%">{{$data['jumlah_mutu']}}</th>
                            </tr>

                             <tr>
                    </table>
                    <p style="text-align: center; ">
                        Indeks Prestasi Kumulatif :  <b>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;{{$data['ipk']}} </b>
                    </p>
                   
</body>
</html>

<style>

@page{
    margin-top: 0.3cm;
    margin-bottom: 0.3cm;
    margin-left: 0.3cm;
    margin-right: 0.3cm;
    background-clip: border-box;
}
</style>