pipeline {
    agent any

    environment {
        DOCKERHUB_CREDENTIALS = credentials('dockerhub')
        IMAGE_NAME = 'issiwara/laravelintermediateapp'
        DOCKERFILE_PATH = '/intermediate-app/Dockerfile'
    }

    stages {
        stage('Build Docker Image') {
            steps {
                script {
                    // Use the docker.build command with the Dockerfile path
                    docker.build("${IMAGE_NAME}:latest", "-f ${DOCKERFILE_PATH} .")
                }
            }
        }

        stage('Login to Docker Hub') {
            steps {
                script {
                    // Use withCredentials to securely provide Docker Hub credentials
                    withCredentials([usernamePassword(credentialsId: DOCKERHUB_CREDENTIALS, usernameVariable: 'DOCKERHUB_USERNAME', passwordVariable: 'DOCKERHUB_PASSWORD')]) {
                        // Log in to Docker Hub
                        sh "echo \${DOCKERHUB_PASSWORD} | docker login -u \${DOCKERHUB_USERNAME} --password-stdin"
                    }
                }
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                script {
                    // Push the built Docker image to Docker Hub
                    docker.withRegistry('https://registry.hub.docker.com', DOCKERHUB_CREDENTIALS) {
                        docker.image("${IMAGE_NAME}:latest").push()
                    }
                }
            }
        }
    }

    post {
        always {
            // Log out from Docker Hub
            sh 'docker logout'
        }
    }
}
