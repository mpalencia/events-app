<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <b-card header="<i class='fa fa-align-justify'></i> Events Date & Time">
          <datatable :headers="['Date & Time From', 'Date & Time To', 'Actions']" :columns="columns" :buttons="buttons"
                     :url="url"/>
        </b-card>
      </div><!--/.col-->
      <!-- Modal Component -->
      <b-modal id="modal1" ref="myModalRef" centered title="Delete Event Date & Time" @ok="deleteRecord">
        <p class="my-4">Are you sure you want to delete this event date & time?</p>
      </b-modal>
    </div><!--/.row-->
  </div>
</template>

<script>
export default {
  name: 'Events',
  loading: true,
  data () {
    return {
      columns: [
        {data: 'timestamp_start'},
        {data: 'timestamp_end'},
        {data: 'actions', bSortable: false, bSearchable: false}
      ],
      url: '',
      buttons: [],
      idToDelete: '',
      eventId: ''
    }
  },
  watch: {
    '$route': 'fetchData'
  },
  created () {
    this.fetchData()
    const component = this
    this.buttons = [
      {
        text: 'Add',
        action: function (e, dt, node, config) {
          component.$router.push({'path': `${component.eventId}/form`})
        }
      }
    ]
  },
  mounted: function () {
    var component = this
    /**
             * Edit button
             */
    $(document).on('click', '#edit', {component: this}, function (e) {
      var id = $(this).data('id')
      e.data.component.$router.push({ path: `${component.eventId}/form/${id}`})
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
    deleteRecord () {
      var component = this
      axios.delete(`organizer/event/${this.eventId}/date-time/${this.idToDelete}/remove`)
        .then(function (response) {
          component.$swal.success('Successfully deleted event timestamps')
          component.$root.$emit('bv::hide::modal', 'modal1')
          $('table').DataTable().draw(false)
        }).catch(function (error) {
          component.$swal.error()
        })
    },
    /**
       * Fetches the data for edit
       */
    fetchData () {
      this.eventId = this.$route.params.event_id
      if (typeof (this.eventId) === 'undefined') return false
      this.url = this.$apiUrl + `organizer/event/${this.eventId}/date-time`
    }
  }
}
</script>
