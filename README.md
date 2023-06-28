***<p align="center">![alt text](https://lanzadera.es/wp-content/uploads/2020/08/Growpro-1.png "GrowPro")</p>***
# Entry points
- - -
| Name      | Url                       |
|-----------|---------------------------|
| **Api**   | http://localhost:8000/api |
| **Admin** | http://localhost:8888     |


# Instructions
- - -

#### Setup your environment
```shell
echo "APP_ENV=dev" > .env.local
make build
make deps
make mi
```

#### Run project
```shell
make start
```

#### Run tests and coverage
```shell
make cc env=test 
make mi env=test
make tests
```

#### Help and more utils
```shell
make help
```

# Look at the challenges of this proof and the documentation
- - -
- See [Native PHP (#1)](wiki/Exercise_1.md)
- See [Native PHP (#2)](wiki/Exercise_2.md)
- See [Symfony Challenge (#3)](wiki/Exercise_3.md)
