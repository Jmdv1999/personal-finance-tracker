/*Tablas*/
let tblIngresos, tblEgresos;
document.addEventListener("DOMContentLoaded", function () {
  tblIngresos = $("#tblIngresos").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    ajax: {
      url: base_url + "Ingresos/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "monto",
        render: function (data, type, row) {
          // esto es lo que se va a renderizar como html
          return `${row.monto}$`;
        },
      },
      {
        data: "concepto",
      },
      {
        data: "fecha",
      },
      {
        data: "acciones",
      },
    ],
  });
  tblEgresos = $("#tblEgresos").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    ajax: {
      url: base_url + "Egresos/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "monto",
        render: function (data, type, row) {
          // esto es lo que se va a renderizar como html
          return `${row.monto}$`;
        },
      },
      {
        data: "concepto",
      },
      {
        data: "fecha",
      },
      {
        data: "acciones",
      },
    ],
  });
  tblDeudas = $("#tblDeudas").DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
    },
    ajax: {
      url: base_url + "Deudas/Listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "monto",
        render: function (data, type, row) {
          // esto es lo que se va a renderizar como html
          return `${row.monto}$`;
        },
      },
      {
        data: "concepto",
      },
      {
        data: "fecha",
      },
      {
        data: "acciones",
      },
    ],
  });
});

/*usuarios*/

function frmResetPass(e) {
  e.preventDefault();
  const actual = document.getElementById("pass_actual").value;
  const nueva = document.getElementById("pass_nueva").value;
  const confirmar = document.getElementById("pass_confirmar").value;
  if (actual == "" || nueva == "" || confirmar == "") {
    Alertas("todos los campos son obligatorios", "warning");
  } else {
    if (nueva != confirmar) {
      Alertas("Las contraseñas no coinciden", "warning");
    } else {
      const url = base_url + "Usuarios/ReiniciarPass";
      const frm = document.getElementById("frmResetPass");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          $("#Modalpass").modal("hide");
          frm.reset();
          Alertas(res.msg, res.icono);
        }
      };
    }
  }
}

/*INGRESOS*/
function ArreglarIngresos() {
  $("#modal-form").modal("show");
}

function frmIngresos(e) {
  e.preventDefault();
  const monto = document.getElementById("monto");
  const concepto = document.getElementById("concepto");
  if (monto.value == "" || concepto.value == "") {
    Alertas("Todos los campos son obligatorios", "warning");
  } else {
    const url = base_url + "Ingresos/Registrar";
    const frm = document.getElementById("frmIngresosReg");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        $("#modal-form").modal("hide");
        Alertas(res.msg, res.icono);
        tblIngresos.ajax.reload();
        frm.reset();
      }
    };
  }
}
function btnEliminarIngreso(id) {
  Swal.fire({
    title: "¿Está seguro?",
    text: "Se eliminara de forma permanente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar",
    cancelButtonText: "No, Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Ingresos/Eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Alertas(res.msg, res.icono);
          tblIngresos.ajax.reload();
        }
      };
    }
  });
}

/*EGRESOS*/
function ArreglarEgresos() {
  $("#modal-form").modal("show");
}
function frmEgresos(e) {
  e.preventDefault();
  const monto = document.getElementById("monto");
  const concepto = document.getElementById("concepto");
  if (monto.value == "" || concepto.value == "") {
    Alertas("Todos los campos son obligatorios", "warning");
  } else {
    const url = base_url + "Egresos/Registrar";
    const frm = document.getElementById("frmEgresos");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        $("#modal-form").modal("hide");
        Alertas(res.msg, res.icono);
        tblEgresos.ajax.reload();
        frm.reset();
      }
    };
  }
}
function btnEliminarEgreso(id) {
  Swal.fire({
    title: "¿Está seguro?",
    text: "Se eliminara de forma permanente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar",
    cancelButtonText: "No, Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Egresos/Eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Alertas(res.msg, res.icono);
          tblEgresos.ajax.reload();
        }
      };
    }
  });
}

/*MISC*/
function Alertas(mensaje, icono) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    background: "#333",
    color: "#fff",
  });
  Toast.fire({
    icon: icono,
    title: mensaje,
  });
}

/*DEUDAS*/
function ArreglarDeudas() {
  $("#modal-form").modal("show");
}
function frmDeudas(e) {
  e.preventDefault();
  const monto = document.getElementById("monto");
  const concepto = document.getElementById("concepto");
  if (monto.value == "" || concepto.value == "") {
    Alertas("Todos los campos son obligatorios", "warning");
  } else {
    const url = base_url + "Deudas/Registrar";
    const frm = document.getElementById("frmDeudasReg");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        $("#modal-form").modal("hide");
        Alertas(res.msg, res.icono);
        tblDeudas.ajax.reload();
        frm.reset();
      }
    };
  }
}
function btnEliminarDeuda(id) {
  Swal.fire({
    title: "¿Está seguro?",
    text: "Se eliminara de forma permanente",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar",
    cancelButtonText: "No, Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Deudas/Eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          Alertas(res.msg, res.icono);
          tblDeudas.ajax.reload();
        }
      };
    }
  });
}
function btnPagarDeuda(id) {
  const url = base_url + "Deudas/obtenerDeuda/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      const inputValue = res.monto;
      Swal.fire({
        title: "Pagar deuda",
        input: "text",
        inputValue,
        text: "Ingrese el monto que desea pagar",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Pagar",
        cancelButtonText: "Cancelar",
      }).then((resultado) => {
        if (resultado.value) {
          let cantidad = resultado.value;
          let body = JSON.stringify({
            monto: cantidad,
            id_deuda: id,
          });
          const url2 = base_url + "Deudas/Pagar/";
          const http2 = new XMLHttpRequest();
          http2.open("POST", url2, true);
          http2.send(body);
          http2.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              Alertas(res.msg, res.icono);
              tblDeudas.ajax.reload();
            }
          };
        }
      });
    }
  };
}
