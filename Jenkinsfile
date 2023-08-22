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
                    def scannerHome = tool name: 'sonar', type: 'hudson.plugins.sonar.SonarRunnerInstallation'
                    
                    withSonarQubeEnv('sonar') {
                        // sh "export SONAR_SCANNER_VERSION=4.7.0.2747 \
                        // && export SONAR_SCANNER_HOME=$HOME/.sonar/sonar-scanner-$SONAR_SCANNER_VERSION-linux \
                        // && curl --create-dirs -sSLo $HOME/.sonar/sonar-scanner.zip https://binaries.sonarsource.com/Distribution/sonar-scanner-cli/sonar-scanner-cli-$SONAR_SCANNER_VERSION-linux.zip 
                        // && unzip -o $HOME/.sonar/sonar-scanner.zip -d $HOME/.sonar/ && exprt PATH=$SONAR_SCANNER_HOME/bin:$PATH \
                        // && export SONAR_SCANNER_OPTS="-server"
"
                        sh "sonar-scanner \
                            -Dsonar.projectKey=test \
                            -Dsonar.sources=. \
                            -Dsonar.token=sqp_1a341187f95d687d3159efdca70aaa5a7733c06f\
                            -Dsonar.host.url=http://localhost:9000" // Run SonarQube Scanner
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
