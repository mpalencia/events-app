<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <b-card header="<i class='fa fa-align-justify'></i> Events Attendees">
          <datatable :headers="['First Name', 'Last Name', 'Email', 'Contact', 'Birthday', 'Address']" :columns="columns" :buttons="buttons"
                     :url="url"/>
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->
  </div>
</template>

<script>
export default {
  name: 'Attendees',
  loading: true,
  data () {
    return {
      columns: [
        {data: 'first_name'},
        {data: 'last_name'},
        {data: 'email'},
        {data: 'contact'},
        {data: 'birthday'},
        {data: 'address'}
      ],
      url: '',
      eventId: ''
    }
  },
  watch: {
    '$route': 'fetchData'
  },
  created () {
    this.fetchData()
  },
  methods: {
    /**
             * Fetches the data for edit
             */
    fetchData () {
      this.eventId = this.$route.params.event_id
      if (typeof (this.eventId) === 'undefined') return false
      this.url = this.$apiUrl + `organizer/event/${this.eventId}/attendees`
    }
  }
}
</script>
