
# NeuroNation Application

## System Requirements

- Docker Desktop installed on your machine
- Docker Compose

## Getting Started

Follow these steps to download, set up, and run the application using Docker.

### 1. Clone the Repository

Start by cloning the repository to your local machine.

```bash
git clone git@github.com:grantjm9992/neuronation-test.git
cd neuronation-test
```

### 2. Automatic Set Up and run Application
Run the following command to build and run the application set up all other components. If you use this, you can skip the other set up steps

```bash
make deploy
```

### 3. Set Up the Application

Before running the application, you need to build the Docker image and install dependencies.

Run the following command to build the application and install dependencies:

```bash
make build
```

This command will:
1. Build the Docker images using `docker-compose`.
2. Run `composer install` inside the Laravel container to install PHP dependencies.

### 4. Running the Application

Once the build process is complete, you can start the application using:

```bash
make run
```

This will start the application container in the background.

### 5. Migrate the Database

To run migrations for the application, use the following command:

```bash
make migrate
```

This will run `php artisan migrate` inside the container to set up your database schema.

### 6. Generate the Laravel Key

To generate the application key, use the following command:

```bash
make generate-key
```

This command will run `php artisan key:generate` inside the container.

### 7. Seed the database

To populate the database, run:

```text
make seed
```

### 8. Stopping the Application

To stop the application and remove the container, run:

```bash
make stop
```

This will stop and remove the Docker container using `docker-compose down`.

### 9. Viewing Logs

To view the logs of the running application, you can use:

```bash
make logs
```

This will tail the logs of the `app` container.

---

## Usage

If you used ```make deploy```, please run ```make info-logs``` and you will see two logs stating "Seeded user email : {some_user}@example.{net/org}"

You can use these emails and the password "password" in the login endpoint.

### Login

```
POST
http://localhost/api/login
```

Request body
```JSON
{"email": "", "password": ""}
```
Response

```JSON
{
    "status": "",
    "authentication": {
        "token": "",
        "type": "bearer"
    },
    "user": {}
}
```
Use the token in the authentication as a bearer token in your next requests.


### Session history

Gets the history for the last 12 sessions for that user

```
GET
http://localhost/api/session/history
```
Response

```JSON
{
  "history": [
    {
      "score": 10,
      "normalizedScore": 10,
      "timestamp": 1720230233
    }...
  ]
}
```

### Last categories trained

Gets the history for the last 12 sessions for that user

```
GET
http://localhost/api/session/latest-categories
```
Response

```JSON
{
  "history": "Recently trained: Category1, Category2"
}
```
---

## Testing

To run all tests included in the project, run:

```BASH
make run-tests
```

---

## Docker Compose Commands

- **`make build`**: Builds the Docker images and installs dependencies.
- **`make run`**: Starts the Docker containers in the background.
- **`make migrate`**: Runs the Laravel migrations.
- **`make generate-key`**: Generates the Laravel application key.
- **`make stop`**: Stops and removes the Docker containers.
- **`make logs`**: Tails the logs of the application container.
- **`make seed`**: Populates the database with data.
- **`make info-logs`**: Tails the logs of the app containing INFO

---

## Troubleshooting

If you encounter any issues, try the following:

- Ensure that Docker and Docker Compose are correctly installed and running.
- Check the Docker container logs for errors (`make logs`).
- Ensure that the correct environment variables are set up in the `.env` file.

---

Enjoy building your Laravel application with Docker!
