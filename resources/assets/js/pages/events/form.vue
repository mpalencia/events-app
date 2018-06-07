<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <b-card>
          <div slot="header">
            <strong>{{ title }}</strong>
          </div>

          <b-form @submit.prevent="submit" @keydown="form.onKeydown($event)">
            <!--start: tags -->
            <b-form-fieldset
              label="Tags"
              description="Please select tags.">
              <b-form-select id="tags"
                             v-model="form.tags"
                             :class="{'is-invalid': form.errors.has('tags')}"
                             name="tags[]"
                             multiple="multiple"
                             data-live-search="true"/>
              <has-error id="tags-error" :form="form" field="tags"/>

            </b-form-fieldset>
            <!--end: tags -->

            <!-- start: title -->
            <b-form-fieldset
              label="Title"
              description="Please enter your event title.">
              <b-form-input v-model="form.name"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            type="text"
                            name="name"
                            placeholder="Enter Title.."
                            max="150"/>
              <has-error :form="form" field="name"/>
            </b-form-fieldset>
            <!-- end: title -->

            <!-- start: Description -->
            <b-form-fieldset
              label="Description"
              description="Please enter your event description.">
              <b-form-textarea id="description"
                               v-model="form.description"
                               :class="{ 'is-invalid': form.errors.has('description') }"
                               :max-rows="6"
                               :rows="3"
                               name="description"
                               placeholder="Enter Description.."/>
              <has-error :form="form" field="description"/>
            </b-form-fieldset>
            <!-- end: Description -->

            <!-- start: Price -->
            <b-form-fieldset
              label="Price"
              description="Please enter your event price.">
              <b-form-input id="price"
                            v-model="form.price"
                            :class="{ 'is-invalid': form.errors.has('price') }"
                            type="number"
                            name="price"
                            placeholder="Enter Price.."/>
              <has-error :form="form" field="price"/>
            </b-form-fieldset>
            <!-- end: Price -->

            <!-- start: Ticket Max -->
            <b-form-fieldset
              label="Ticket Max"
              description="Please enter your event ticket max.">
              <b-form-input id="ticket-max"
                            v-model="form.ticket_max"
                            :class="{ 'is-invalid': form.errors.has('ticket_max') }"
                            type="number"
                            name="ticket_max"
                            placeholder="Enter Ticket Max.."/>
              <has-error :form="form" field="ticket_max"/>
            </b-form-fieldset>
            <!-- end: Ticket Max -->

            <!-- start: Contact -->
            <b-form-fieldset
              label="Contacts"
              description="Please enter your event contacts.">
              <b-form-textarea id="contact"
                               v-model="form.contact"
                               :class="{ 'is-invalid': form.errors.has('contact') }"
                               :max-rows="6"
                               :rows="3"
                               name="contact"
                               placeholder="Enter Contacts.."/>
              <has-error :form="form" field="contact"/>
            </b-form-fieldset>
            <!-- end: Contact -->

            <!-- start: status -->
            <b-form-fieldset
              label="Status"
              description="Please select your event status.">
              <b-form-select v-model="form.status"
                             :class="{ 'is-invalid': form.errors.has('status') }"
                             :options="options"
                             name="status"/>
              <has-error :form="form" field="status"/>
            </b-form-fieldset>
            <!-- end: status -->

            <alert-errors :form="form" message="There were some problems with your input."/>

            <!-- start: footer buttons -->
            <div slot="footer">
              <b-button :disabled="form.busy" type="submit" size="sm" variant="primary"><i
                class="fa fa-dot-circle-o"/> {{ submitLabel }}
              </b-button>
              <b-button type="reset" size="sm" variant="danger" @click="$router.go(-1)"><i
                class="fa fa-ban"/> Cancel
              </b-button>
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
import 'bootstrap-select/dist/css/bootstrap-select.min.css'
import 'bootstrap-select/dist/js/bootstrap-select.min'

export default {
  name: 'Forms',
  data: function () {
    return {
      form: new Form({
        tags: [],
        name: '',
        description: '',
        price: 0,
        ticket_max: 0,
        contact: '',
        status: null
      }),
      options: [
        { value: null, text: 'Please select event status' },
        {value: 'O', text: 'Open'},
        {value: 'L', text: 'Live'},
        {value: 'D', text: 'Done'}
      ],
      title: '',
      submitLabel: ''
    }
  },
  watch: {
    '$route': 'fetchData'
  },
  created () {
    this.fetchData()
  },
  mounted: function () {
    var component = this
    axios.get('tags')
      .then(function (response) {
        var data = response.data.data
        for (var i in data) {
          var datum = data[i]
          $('select[id=tags]').append('<option value="' + datum.id + '">' + datum.title + '</option>')
        }
        $('select[id=tags]').selectpicker('val', component.form.tags)
      })

    this.title = typeof (this.$route.params.event_id) === 'undefined' ? 'Create New Event' : 'Update Event'
    this.submitLabel = typeof (this.$route.params.event_id) === 'undefined' ? 'Create' : 'Update'
  },
  updated: function () {
    // add the tags errors in form
    if (this.form.errors.has('tags')) {
      $('select[id=tags]').next().css('border-color', '#f86c6b')
      $('#tags-error').css('display', 'block')
    } else {
      $('select[id=tags]').next().css('border-color', '')
      $('#tags-error').css('display', '')
    }
  },
  methods: {
    submit: async function () {
      var eventId = this.$route.params.event_id

      const {data} = typeof (eventId) === 'undefined'
        ? await this.form.post('organizer/event/create')
        : await this.form.put(`organizer/event/${eventId}/update`)

      this.$swal.success(data.message)
      if (typeof (eventId) === 'undefined') {
        this.form.reset()
        $('select[id=tags]').selectpicker('val', '')
      }
    },
    /**
             * Fetches the data for edit
             */
    fetchData () {
      var component = this
      var eventId = this.$route.params.event_id
      if (typeof (eventId) === 'undefined') return false

      axios.get(`organizer/event/${eventId}/edit`)
        .then(function (response) {
          var data = response.data.data
          data.contact = data.contact[0].contacts

          var tagsTemp = data.tags
          delete data['tags']
          data.tags = []
          for (var i in tagsTemp) {
            data.tags.push(tagsTemp[i].id)
          }

          component.form.fill(data)
        })
    }
  }
}
</script>
