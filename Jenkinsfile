pipeline {
    agent any
    
    environment {
        SONAR_SCANNER_HOME = tool name: 'SonarQubeScanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
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
                    def scannerHome = tool name: 'SonarQubeScanner', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    
                    withSonarQubeEnv('sonar') {
                        sh "${scannerHome}/bin/sonar-scanner" // Run SonarQube Scanner
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
