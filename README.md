# This repository should work on OpenShift Starter OCP4
- For instructions, please watch YouTube video [How to Build Orchidsoftware/Platform v3 on Openshift Starter](https://alexei-cioina.b9ad.pro-us-east-1.openshiftapps.com/page/view/blog-categories-en) 
```
        - name: DASHBOARD_PREFIX
          value: 'this_is_a_secret_prefix'
        - name: APP_KEY
          value: 'base64:generate_it!'
        - name: APP_URL
          value: 'http://laravel-cioina.apps.us-east-1.starter.openshift-online.com'
        - name: MYSQL_SERVICE_HOST
          value: 'mysql.cioina.svc'
        - name: DB_DATABASE
          value: 'default'
        - name: DB_USERNAME
          valueFrom:
            secretKeyRef:
              key: databaseUser
              name: laravel
        - name: DB_PASSWORD
          valueFrom:
            secretKeyRef:
              key: databasePassword
              name: laravel
```
