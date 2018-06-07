// const Welcome = () => import('~/pages/welcome').then(m => m.default || m)
// const Login = () => import('~/pages/auth/login').then(m => m.default || m)
// const Register = () => import('~/pages/auth/register').then(m => m.default || m)
// const PasswordEmail = () => import('~/pages/auth/password/email').then(m => m.default || m)
// const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
// const NotFound = () => import('~/pages/errors/404').then(m => m.default || m)

// const Home = () => import('~/pages/home').then(m => m.default || m)
// const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
// const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
// const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)

const Events = () => import('~/pages/events/index').then(m => m.default || m)
const EventsForm = () => import('~/pages/events/form').then(m => m.default || m)
const Dashboard = () => import('~/pages/dashboard/index').then(m => m.default || m)
const DateTime = () => import('~/pages/events/date_time/index').then(m => m.default || m)
const DateTimeForm = () => import('~/pages/events/date_time/form').then(m => m.default || m)
const Attendees = () => import('~/pages/events/attendees/index').then(m => m.default || m)
const Locations = () => import('~/pages/events/locations/index').then(m => m.default || m)
const LocationsForm = () => import('~/pages/events/locations/form').then(m => m.default || m)
const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Default = () => import('~/layouts/default').then(m => m.default || m)

export default [
  {path: '/login', name: 'login', component: Login},
  {
    path: '/',
    redirect: '/dashboard',
    name: 'Home',
    component: Default,
    children: [
      { // Dashboard
        path: 'dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      { // Events
        path: 'events',
        redirect: '/events',
        name: 'Events',
        component: {
          render (c) {
            return c('router-view')
          }
        },
        children: [
          { // events
            path: '',
            name: 'List',
            component: Events
          },
          { // events/form
            path: 'form/:event_id?',
            name: 'Form',
            component: EventsForm
          },
          { // events/date-time/:event_id
            path: 'date-time/:event_id',
            name: 'Date & Time',
            component: DateTime
          },
          { // events/date-time/:event_id/form
            path: 'date-time/:event_id/form/:id?',
            name: 'Date & Time Form',
            component: DateTimeForm
          },
          { // events/date-time/:event_id
            path: 'attendees/:event_id',
            name: 'Attendees',
            component: Attendees
          },
          { // events/locations/:event_id
            path: 'locations/:event_id',
            name: 'Locations',
            component: Locations
          },
          { // events/locations/:event_id/form/:id?
            path: 'locations/:event_id/form/:id?',
            name: 'Locations Form',
            component: LocationsForm
          }
        ]
      }
    ]
  }
  // {path: '/', name: '', component: Dashboard},
  // {path: '/dashboard', name: 'dashboard', component: Dashboard}

  // {path: '/login', name: 'login', component: Login}
  // {path: '/register', name: 'register', component: Register},
  // {path: '/password/reset', name: 'password.request', component: PasswordEmail},
  // {path: '/password/reset/:token', name: 'password.reset', component: PasswordReset},

  // {path: '/home', name: 'home', component: Home},
  // {path: '/dashboard', name: 'dashboard', component: Dashboard},
  // {
  //   path: '/settings',
  //   component: Settings,
  //   children: [
  //     {path: '', redirect: {name: 'settings.profile'}},
  //     {path: 'profile', name: 'settings.profile', component: SettingsProfile},
  //     {path: 'password', name: 'settings.password', component: SettingsPassword}
  //   ]
  // },

  // {path: '*', component: NotFound}
]
