export default [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/HomeView.vue')
  },
  {
    path: '/2',
    name: 'home2',
    component: () => import('@/views/Home2.vue')
  },
  {
    path: '/register',
    name: 'UserRegister',
    component: () => import('@/views/UserRegister.vue')
  },
  {
    path: '/login',
    name: 'UserLogin',
    component: () => import('@/views/UserLogin.vue')
  },
  {
    path: '/logout',
    name: 'UserLogout',
    component: () => import('@/views/UserLogout.vue')
  },
  //   {
  //     path: '/forgot-password',
  //     name: 'forgot-password',
  //     component: () => import('@/views/ForgotPassword.vue')
  //   },
  //   {
  //     path: '/profile',
  //     name: 'UserProfile',
  //     component: () => import('@/views/UserProfile.vue')
  //   },
  {
    path: '/:name',
    name: 'category',
    component: () => import('@/views/Category.vue')
  },
  {
    path: '/admin',
    name: 'admin',
    component: () => import('@/views/admin/LayoutView.vue'),
    //   meta: {
    //     requiresAuth: true
    //   },
    children: [
      {
        path: 'dashboard',
        name: 'admin-dashboard',
        component: () => import('@/views/admin/DashboardView.vue')
      },
      {
        path: 'brands',
        name: 'BrandsIndex',
        component: () => import('@/views/admin/brands/BrandsIndex.vue'),
        meta: {
          title: 'Brands'
        }
      },
      {
        path: 'brands/create',
        name: 'BrandsCreate',
        component: () => import('@/views/admin/brands/BrandsCreate.vue'),
        meta: {
          title: 'Create brand'
        }
      },
      {
        path: 'brands/:id',
        name: 'BrandsShow',
        component: () => import('@/views/admin/brands/BrandsShow.vue'),
        meta: {
          title: 'Show brand'
        }
      },
      {
        path: 'brands/:id/edit',
        name: 'BrandsEdit',
        component: () => import('@/views/admin/brands/BrandsEdit.vue'),
        meta: {
          title: 'Edit brand'
        }
      },
      {
        path: 'users',
        name: 'UsersIndex',
        component: () => import('@/views/admin/brands/UsersIndex.vue'),
        meta: {
          title: 'Users'
        }
      }
      //   {
      //     path: 'categories',
      //     name: 'admin-categories',
      //     component: () => import('@/views/admin/categories/ListView.vue')
      //   },
      //   {
      //     path: 'users',
      //     name: 'admin-users',
      //     component: () => import('@/views/admin/users/ListView.vue')
      //   },
      //   {
      //     path: 'product',
      //     name: 'admin.product',
      //     component: () => import('@/views/admin/product/ListView.vue')
      //   },
      //   {
      //     path: 'coupon',
      //     name: 'admin.coupon',
      //     component: () => import('@/views/admin/coupon/ListView.vue')
      //   },
      //   {
      //     path: 'order',
      //     name: 'admin.order',
      //     component: () => import('@/views/admin/order/ListView.vue')
      //   }
    ]
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'notfound',
    component: () => import('@/views/NotFound.vue')
  }
]
