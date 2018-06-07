<template>
  <table class="table-responsive table">
    <thead>
      <tr>
        <th scole="col" v-for="header in headers">
          {{ header }}
        </th>
      </tr>
    </thead>
    <tbody/>
  </table>
</template>

<script>
import 'datatables.net-bs4'
import 'datatables.net-bs4/css/dataTables.bootstrap4.css'
import 'datatables.net-buttons-bs4'
import 'datatables.net-responsive-bs4'

import store from '~/store'

export default {
  name: 'Datatable',
  props: {
    headers: {
      type: Array,
      required: true
    },
    url: {
      type: String,
      required: true
    },
    columns: {
      type: Array,
      default: function () {
        return []
      }
    },
    buttons: {
      type: Array,
      default: function () {
        return []
      }
    }
  },
  mounted () {
    $('table').DataTable({
      responsive: true,
      dom: "<'row'<'col-md-6'l><'col-md-6'Bf>>" +
                "<'row'<'col-md-6'><'col-md-6'>>" +
                "<'row'<'col-md-12't>><'row'<'col-md-12'ip>>",
      serverSide: true,
      processing: true,
      stateSave: true,
      ajax: {
        url: this.url,
        beforeSend: function (request) {
          request.setRequestHeader('Request-Type', 'Datatable')
          request.setRequestHeader('Authorization', 'Bearer ' + store.getters['auth/token'])
        }
      },
      columns: this.columns,
      buttons: this.buttons
    })
  }
}
</script>
<style>
    div.dt-buttons {
        float: right;
        margin-left: 10px;
    }
</style>
