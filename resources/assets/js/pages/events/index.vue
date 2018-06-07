<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <b-card header="<i class='fa fa-align-justify'></i> Events">
          <datatable :headers="['Title', 'Description', 'Price', 'Ticket Max', 'Status', 'Actions']" :columns="columns" :buttons="buttons"
                     :url="url"/>
        </b-card>
      </div><!--/.col-->
      <!-- Modal Component -->
      <b-modal id="modal1" ref="myModalRef" centered title="Delete Event" @ok="deleteEvent">
        <p class="my-4">Are you sure you want to delete this event?</p>
      </b-modal>
    </div><!--/.row-->
  </div>
</template>

<script>
export default {
  name: 'Events',
  middleware: 'auth',
  loading: true,
  data () {
    const router = this.$router
    return {
      columns: [
        {data: 'name'},
        {data: 'description'},
        {data: 'price'},
        {data: 'ticket_max'},
        {data: 'status'},
        {data: 'actions', bSortable: false, bSearchable: false}
      ],
      url: this.$apiUrl + 'organizer/event',
      buttons: [
        {
          text: 'Add',
          action: function (e, dt, node, config) {
            router.push({'path': 'events/form'})
          }
        }
      ],
      idToDelete: ''
    }
  },
  mounted: function () {
    var component = this
    /**
     * Edit button
     */
    $(document).on('click', '#edit', {component: this}, function (e) {
      var id = $(this).data('id')
      e.data.component.$router.push({ path: `events/form/${id}`})
    })

    /**
     * Date / Time button
     */
    $(document).on('click', '#date-time', {component: this}, function (e) {
      var id = $(this).data('id')
      e.data.component.$router.push({ path: `events/date-time/${id}`})
    })

    /**
       * Attendees button
       */
    $(document).on('click', '#attendees', {component: this}, function (e) {
      var id = $(this).data('id')
      e.data.component.$router.push({ path: `events/attendees/${id}`})
    })

    /**
     * Location button
     */
    $(document).on('click', '#locations', {component: this}, function (e) {
      var id = $(this).data('id')
      e.data.component.$router.push({ path: `events/locations/${id}`})
    })

    /**
     * Delete button
     */
    $(document).on('click', '#delete', function (e) {
      var id = $(this).data('id')
      component.idToDelete = id
      component.$root.$emit('bv::show::modal', 'modal1')
    })
  },
  methods: {
    deleteEvent () {
      var component = this
      axios.delete(`organizer/event/${this.idToDelete}/remove`)
        .then(function (response) {
          component.$swal.success('Successfully deleted an event')
          component.$root.$emit('bv::hide::modal', 'modal1')
          $('table').DataTable().draw(false)
        }).catch(function (error) {
          component.$swal.error()
        })
    }
  }
}
</script>
