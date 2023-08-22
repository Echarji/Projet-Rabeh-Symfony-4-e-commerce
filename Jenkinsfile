pipeline {
    agent any
    
    environment {
        SCANNER_HOME = tool 'sonar'
    }

    stages {
        stage('Checkout') {
            steps {
                script {
                    checkout scm
                }
            }
        }
        
        
        stage('SonarQube Analysis') {
            steps {
                script {
                    
                    
                    withSonarQubeEnv('SonarQubeScanner') {
                        
                        sh '''$SCANNER_HOME/bin/sonar-scanner \
                            -Dsonar.projectKey=test \
                            -Dsonar.sources=. \
                            -Dsonar.token=sqp_1a341187f95d687d3159efdca70aaa5a7733c06f\
                            -Dsonar.host.url=http://localhost:9000 '''
                    }
                }
            }
        }
    }
    
    post {
        always {
            // Clean up after the pipeline finishes
            deleteDir()
        }
    }
}
