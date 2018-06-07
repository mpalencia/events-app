<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <b-card>
          <div slot="header">
            <strong>{{ title }}</strong>
          </div>
          <b-form @submit.prevent="submit" @keydown="form.onKeydown($event)">
            <!--start: location-name -->
            <b-form-fieldset
              label="Location Name"
              description="Please enter your event location name.">
              <b-form-input v-model="form.name"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            type="text"
                            placeholder="Enter Location Name.."
                            class="form-control"
                            max="150"/>
              <has-error :form="form" field="name"/>
            </b-form-fieldset>
            <!-- end: location-name -->

            <!--start: Address -->
            <b-form-fieldset
              label="Address"
              description="Please enter your event address.">
              <b-form-textarea id="address"
                               v-model="form.address"
                               :class="{ 'is-invalid': form.errors.has('address') }"
                               name="address"
                               :rows="3"
                               :max-rows="6"
                               class="form-control"
                               placeholder="Enter address.."/>
              <has-error :form="form" field="address"/>
              <Gmap/>
            </b-form-fieldset>
            <!-- end: Address-->

            <alert-errors :form="form" message="There were some problems with your input."/>

            <!-- start: footer buttons -->
            <div slot="footer">
              <b-button :disabled="form.busy" type="submit" size="sm" variant="primary"><i class="fa fa-dot-circle-o"/> {{ submitLabel }}
              </b-button>
              <b-button type="reset" size="sm" variant="danger" @click="$router.go(-1)"><i class="fa fa-ban"/> Cancel</b-button>
            </div>
            <!-- end: footer buttons -->

          </b-form>
        </b-card>
      </div><!--/.col-->
    </div><!--/.row-->

  </div>

</template>

<script>
import Form from 'vform'

export default {
  name: 'LocationForm',

  data: function () {
    return {
      form: new Form({
        name: '',
        address: ''
      }),
      title: '',
      submitLabel: '',
      eventId: '',
      id: ''
    }
  },
  watch: {
    '$route': 'fetchData'
  },
  created () {
    this.fetchData()
  },
  mounted: function () {
    this.title = typeof (this.$route.params.id) === 'undefined' ? 'Create New Event Location' : 'Update Event Location'
    this.submitLabel = typeof (this.$route.params.id) === 'undefined' ? 'Create' : 'Update'
  },
  methods: {
    submit: async function () {
      this.form.lat = $('#lat').val()
      this.form.lng = $('#lng').val()
      const {data} = typeof (this.id) === 'undefined'
        ? await this.form.post(`organizer/event/${this.eventId}/locations/create`)
        : await this.form.put(`organizer/event/${this.eventId}/locations/${this.id}/update`)

      this.$swal.success(data.message)
      if (typeof (this.id) === 'undefined')
        this.form.reset()

    },
    /**
       * Fetches the data for edit
       */
    fetchData () {
      var component = this
      this.eventId = this.$route.params.event_id
      this.id = this.$route.params.id
      if (typeof (this.id) === 'undefined') return false

      axios.get(`organizer/event/${this.eventId}/locations/${this.id}/edit`)
        .then(function (response) {
          var lat = response.data.lat
          var lng = response.data.lng
          component.form.fill({
            'name': response.data.name,
            'address': response.data.address,
            'lat': lat,
            'lng': lng
          })
          $('#lat').val(response.data.lat)
          $('#lng').val(response.data.lng)
        })
    }
  }
}
</script>
