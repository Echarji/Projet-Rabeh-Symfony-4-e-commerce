pipeline {
    agent any
    
    environment {
        SONAR_SCANNER_HOME = tool name: 'sonar', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
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
                    def scannerHome = tool name: 'sonar', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    
                    withSonarQubeEnv('SonarQubeScanner') {
                        
                        sh "sonar-scanner \
                            -Dsonar.projectKey=test \
                            -Dsonar.sources=. \
                            -Dsonar.token=sqp_1a341187f95d687d3159efdca70aaa5a7733c06f\
                            -Dsonar.host.url=http://localhost:9000" 
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
